<?php

/* COPYRIGHT (C) HARRY CLARK 2024 */
/* GENERIC ALL PURPOSE PHP PASSWORD GENERATOR */

/* THE FOLLOWING FILE PERTAINS TOWARDS THE FUNCTIONALITY OF USING 
PHP'S BUILT-IN CYRPTOGRAPHIC FUNCTIONS, REJECTION SAMPLING TO REMOVE RANDOM BIAS
(CON-CURRENT CREATIONS OF THE SAME HASH BASED ON THE SAME CHAR'S)

AMONG OTHER PRE-REQUISITES THAT WILL MAKE THIS UTILITY A VERSATILE ALTERNATIVE
*/

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

/* PRE-PROCESSOR DIRECTIVES */

define('MAX_PASSWORD_LEN', 128);
define('MIN_PASSWORD_LEN', 12);
define('MULTI', 2);

// CHARACTER SET DEFINITIONS

const UPPER = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
const LOWER = 'abcdefghijklmnopqrstuvwxyz';
const NUMS = '0123456789';
const SYMS = '!@#$%^&*()-_=+[]';

$HAS_UPPER = 1;
$HAS_LOWER = 1;
$HAS_NUMBER = 1;
$HAS_SYMBOL = 1;
$MIN_UPPER = 1;
$MIN_LOWER = 1;
$MIN_NUMBER = 1;
$MIN_SYMBOL = 1;


class Password
{
    // JUST ACCESS THE SECURE BYTES OF THE RANDOMLY GENERATED HASH

    public function GET_SECURE_BYTES($LEN) { return random_bytes($LEN); }

    /* CREATES A CRYPTOGRAPHICALLY SECURE RE-ARRANGEMENT BASED ON THE CURRENT
    * ELEMENTS IN AN GIVEN ARRAY OF CHARACTERS
    *  SEE FISHER-YATES SHUFFLE: https://en.wikipedia.org/wiki/Fisher%E2%80%93Yates_shuffle
    *
    *  PROVIDES UNBIASED RANDOMIZATION OF PASSWORD CHARACTERS
    *  @param &$ARRAY: REFERENCE TO ARRAY TO BE SHUFFLED
    *  @throws Exception ON RANDOM NUMBER GENERATION FAILURE
    */

    public function CRYPTO_SHUFFLE(array $ARRAY): void
    {
        // DISCERN THE ELEMENTS WITHIN THE ARRAY

        $NTH_ELEMENT = count($ARRAY);

        // ASSUME THAT THE ARRAY IS EMPTY

        if($NTH_ELEMENT <= 1) { return; }

        try
        {
            // NOW DISCERN HOW MANY ELEMENTS ARE WITHIN THE ARRAY
            // AND CREATE A NEW ITERATION TO PRODUCE A RANDOM RESULT FROM

            // LOOK FOR ALL POSSIBLE CONCURRENT ELEMENTS WITHIN THE ARRAY TO BE ABLE TO SWAP AROUND

            for($INDEX = $NTH_ELEMENT - 1; $INDEX > 0; $INDEX--)
            {
                $NEW_ITER = random_int(0, $INDEX);
                [$ARRAY[$INDEX], [$ARRAY[$NEW_ITER]] = [$ARRAY[$NEW_ITER], $ARRAY[$INDEX]]];
            }
        }

        catch (Exception $EX)
        {
            throw new Exception('Failed to generate random numbers: ' . $EX->getMessage());
        }
    }

    /* GENERATES UNBIASED RANDOM CHARACTER FROM CHARSET
    *  USES REJECTION SAMPLING TO ELIMINATE MODULO BIAS
    *  @param $CHARSET: CHARACTER SET TO SAMPLE FROM
    *  @param &$POOL: REFERENCE TO ENTROPY POOL
    *  @param &$INDEX: REFERENCE TO CURRENT POOL INDEX
    *  @return: RANDOMLY SELECTED CHARACTER
    */

    public function GET_UNBIASED_CHAR($CHARSET, &$POOL, &$INDEX)
    {
        $CHARSET_SIZE = strlen($CHARSET);
        $MAX_VALID = (PHP_INT_MAX - (PHP_INT_MAX % $CHARSET_SIZE));

        // ASSUME THAT THE LENGTH OF THE STRING IS INDICATIVE OF THE PRE-REQUSITIES

        do 
        {
            if ($INDEX >= strlen($POOL))
            {
                $POOL = $this->GET_SECURE_BYTES(strlen($POOL));
                $INDEX = 0;
            }

            // ASSUME WE HAVE AN INDICATIVE MATCH, READ THE FIRST 4 BYTES
            // OF THE ENTROPY POOL TO DISCERN A VALID BITWISE LENGTH 

            $RANDOM = unpack('N', substr($POOL, $INDEX, 4))[1];
            $INDEX += 4;

        } while ($RANDOM > $MAX_VALID);

        return $CHARSET[$RANDOM % $CHARSET_SIZE];
    }


    /* VALIDATES PASSWORD AGAINST REQUIREMENTS
    *  ENSURES MINIMUM CHARACTER TYPE COUNTS ARE MET
    *  @param $PASSWORD: PASSWORD TO VALIDATE
    *  @param $LEN: PASSWORD LENGTH
    *  @param $REQS: REQUIREMENTS OBJECT
    *  @return: BOOLEAN INDICATING IF PASSWORD MEETS REQUIREMENTS
    */

    public function IS_VALID_PASSWORD($PASSWORD, $LEN, $REQS)
    {
        $UPPER_COUNT = preg_match_all('/[' . UPPER . ']/', $PASSWORD);
        $LOWER_COUNT = preg_match_all('/[' . LOWER . ']/', $PASSWORD);
        $NUMS_COUNT = preg_match_all('/[' . NUMS . ']/', $PASSWORD);
        $SYMS_COUNT = preg_match_all('/[' . SYMS . ']/', $PASSWORD);

        return $UPPER_COUNT >= $REQS->MIN_UPPER &&
               $LOWER_COUNT >= $REQS->MIN_LOWER &&
               $NUMS_COUNT >= $REQS->MIN_NUMS &&
               $SYMS_COUNT >= $REQS->MIN_SYMS;
    }

     /* MAIN PASSWORD GENERATION METHOD
    *  CREATES SECURE PASSWORD MEETING ALL REQUIREMENTS
    *  @param $LEN: DESIRED PASSWORD LENGTH
    *  @param $REQS: REQUIREMENTS OBJECT
    *  @return: GENERATED PASSWORD
    *  @throws Exception ON INVALID LENGTH OR REQUIREMENTS
    */

    public function GENERATE_PASSWORD($LEN, $REQS)
    {
        /* VALIDATE PASSWORD LENGTH AGAINST CONSTRAINTS */

        if ($LEN < MIN_PASSWORD_LEN || $LEN > MAX_PASSWORD_LEN)
        {
            throw new Exception("PASSWORD LENGTH MUST BE BETWEEN " . MIN_PASSWORD_LEN . " AND " . MAX_PASSWORD_LEN);
        }

        /* ENSURE LENGTH CAN ACCOMMODATE MINIMUM REQUIREMENTS */

        $MIN_REQUIRED = $REQS->MIN_UPPER + $REQS->MIN_LOWER + 
                       $REQS->MIN_NUMS + $REQS->MIN_SYMS;

        if ($LEN < $MIN_REQUIRED)
        {
            throw new Exception("PASSWORD LENGTH TOO SHORT FOR REQUIREMENTS");
        }

        /* INITIALIZE ENTROPY POOL AND PASSWORD ARRAY */

        $POOL = $this->GET_SECURE_BYTES($LEN * MULTI * 4);
        $INDEX = 0;
        $PASSWORD_ARRAY = [];

        /* FULFILL MINIMUM REQUIREMENTS FOR EACH CHARACTER TYPE */

        for ($I = 0; $I < $REQS->MIN_UPPER; $I++)
        {
            $PASSWORD_ARRAY[] = $this->GET_UNBIASED_CHAR(UPPER, $POOL, $INDEX);
        }

        for ($I = 0; $I < $REQS->MIN_LOWER; $I++)
        {
            $PASSWORD_ARRAY[] = $this->GET_UNBIASED_CHAR(LOWER, $POOL, $INDEX);
        }

        for ($I = 0; $I < $REQS->MIN_NUMS; $I++)
        {
            $PASSWORD_ARRAY[] = $this->GET_UNBIASED_CHAR(NUMS, $POOL, $INDEX);
        }

        for ($I = 0; $I < $REQS->MIN_SYMS; $I++)
        {
            $PASSWORD_ARRAY[] = $this->GET_UNBIASED_CHAR(SYMS, $POOL, $INDEX);
        }

        /* CONSTRUCT ALLOWED CHARACTER SET BASED ON REQUIREMENTS */

        $CHARSET = '';
        if ($REQS->HAS_UPPER) $CHARSET .= UPPER;
        if ($REQS->HAS_LOWER) $CHARSET .= LOWER;
        if ($REQS->HAS_NUMS) $CHARSET .= NUMS;
        if ($REQS->HAS_SYMS) $CHARSET .= SYMS;

        /* FILL REMAINING LENGTH WITH RANDOM CHARACTERS */

        while (count($PASSWORD_ARRAY) < $LEN)
        {
            $PASSWORD_ARRAY[] = $this->GET_UNBIASED_CHAR($CHARSET, $POOL, $INDEX);
        }

        /* SHUFFLE AND VALIDATE FINAL PASSWORD */

        $this->CRYPTO_SHUFFLE($PASSWORD_ARRAY);
        $PASSWORD = implode('', $PASSWORD_ARRAY);

        if (!$this->IS_VALID_PASSWORD($PASSWORD, $LEN, $REQS))
        {
            return $this->GENERATE_PASSWORD($LEN, $REQS);
        }

        return $PASSWORD;
    }
}

///////////////////////////////////////////////////////////
//              PHP POST AND GET FUNCTONALITY
//=========================================================
//      THIS IS TO COMM. WITH THE AJAX HANDLER WHICH PARSES
//  THIS INFORMATION THROUGH IT'S RESPECTIVE FUNCTION CALL
///////////////////////////////////////////////////////////


if ($_SERVER['REQUEST_METHOD'] !== 'POST') 
{
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
error_log(print_r($data, true)); 

if (isset($data['length']) && isset($data['requirements'])) 
{
    try 
    {
        $passwordGenerator = new Password();
        $password = $passwordGenerator->GENERATE_PASSWORD($data['length'], (object)$data['requirements']);
        echo json_encode(['password' => $password]);
    } 
    catch (Exception $e) 
    {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
} 
else 
{
    http_response_code(400);
    echo json_encode(['error' => 'Invalid input']);
}

?>

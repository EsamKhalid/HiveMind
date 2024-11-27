# phpPass
A Generic all purpose PHP Password Generator (CS2_TP) 

![image](https://github.com/user-attachments/assets/9616b30f-b295-4622-b048-00c7e6b52a5e)

## Motive:

The ambition behind this repository is to provide an ease of use means of implementing a series of hashing and randomisation
to be able to conjure up various randomised passwords for a User Sign up field on a Website.

To achieve this featuree to the fullest capacity, I will be going beyond the scope of the pre-requisite php obfuscation tools to provide further clarity on password generation, ensuring that no one password is the same.


## Features:

- Cryptography and Secure randomneess using php overhead
- Modulo Bias Mitigation, to avoid malific and similar password generation with specific chars
- Modular password requirements for Upper/Lower cases, Numbers, Symbols, etc
- Expansive Entropy, used for providing a greater scale of randomisation

## Building:

```
git clone this repo

for use with httpd, sudo copy everything into /srv/http

to save changes, change permissions of the folder
```

```c
sudo chown -R USER:USER /srv/http/name_of_folder
```

## Sources:

[PHP Docs](https://www.php.net/manual/en)

[Cryptography Ref](https://www.nist.gov/publications)

[Modulo Bias circumventations](https://cmvandrevala.wordpress.com/2016/09/24/modulo-bias-when-generating-random-numbers/)

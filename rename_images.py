import os

# Dictionary mapping product names to product IDs
product_mapping = {
    "product1": "id1",
    "product2": "id2",
    "product3": "id3",
    # ... add all product name to ID mappings here ...
}

# Directory containing the images
image_directory = r'public\Images\product images'

# Iterate over the files in the directory
for filename in os.listdir(image_directory):
    # Extract the product name from the filename (assuming the format is 'productname.extension')
    product_name, extension = os.path.splitext(filename)
    
    # Get the corresponding product ID
    product_id = product_mapping.get(product_name)
    
    if product_id:
        # Construct the new filename
        new_filename = f"{product_id}{extension}"
        
        # Get the full paths
        old_file = os.path.join(image_directory, filename)
        new_file = os.path.join(image_directory, new_filename)
        
        # Rename the file
        os.rename(old_file, new_file)
        print(f"Renamed {old_file} to {new_file}")
    else:
        print(f"No mapping found for {filename}")

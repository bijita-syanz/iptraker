import json
import os 
def display_json_as_rows(file_path):
    try:
        with open(file_path, 'r') as json_file:
            data = json.load(json_file)
            rownumber = 0
            for entry in data:
                rownumber +=1
                print(f"\nRow  {rownumber}:")
                for key, value in entry.items():
                    print(f"{key}: {value}")
    except FileNotFoundError:
        print(f"Error: The file '{file_path}' was not found.")
    except json.JSONDecodeError:
        print("Error: Failed to decode JSON. Please check the file format.")
def main() :
  while True :
    choise = input(">> ")
    if choise == "show" :
       display_json_as_rows(file_path)
    elif choise == "rm" :
       r = input("do you want to delete the json file (y/n) : ")
       if r == "y" :
           with open(file_path , "w") as file :
               file.write(" ")
       else :
          pass
    elif choise == "exit" :
        exit()
    else:
       pass
if __name__ == "__main__":
    file_path = 'data.json'
    while True :
        main()
    print("\ncreated by bijita: v 1.0")



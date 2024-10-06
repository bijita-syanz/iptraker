import json

def display_json_as_rows(file_path):
    try:
        with open(file_path, 'r') as json_file:
            data = json.load(json_file)
            for entry in data:
                print("\nRow:")
                for key, value in entry.items():
                    print(f"{key}: {value}")
    except FileNotFoundError:
        print(f"Error: The file '{file_path}' was not found.")
    except json.JSONDecodeError:
        print("Error: Failed to decode JSON. Please check the file format.")

if __name__ == "__main__":
    file_path = 'data.json'
    display_json_as_rows(file_path)
    print("created by bijita: v 1.0")


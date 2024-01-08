my_string_list = ["apple", "banana", "cherry", "date"]

# Hiển thị danh sách trước khi thay đổi
print("Danh sách trước khi thay đổi:", my_string_list)

# Duyệt qua danh sách và thay đổi giá trị của phần tử thứ 2 (chỉ số 1)
for index, value in enumerate(my_string_list):
    if index == 1:  # Chỉ số của phần tử cần thay đổi
        my_string_list[index] = "blueberry"

# Hiển thị danh sách sau khi thay đổi
print("Danh sách sau khi thay đổi:", my_string_list)
# 1. Clone dự án

git clone https://github.com/Vuong-Cong-Thai/Personalized-English-learning-app.git

# 2. Tạo nhánh mới

git checkout -b <Tên nhánh>

# 3. Thêm và commit

git add .
git commit -m "<Message>"

# 4. Push lên GitHub

git push -u <Tên nhánh> <Lần đầu>
git push <Các lần sau>

# 5. Cập nhật từ main (khi cần)

git checkout master
git pull origin master
git checkout <Tên nhánh>
git merge master

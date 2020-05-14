#Xóa các container đã dừng (đã thoát):
docker ps --no-trunc -aqf "status=exited" | xargs docker rm

#Xóa hình ảnh không sử dụng (lơ lửng):
docker images --no-trunc -aqf "dangling=true" | xargs docker rmi

#Nếu bạn đã hết sức thận trọng về việc mất dữ liệu không thể hủy bỏ , thì bạn có thể xóa các khối lượng không sử dụng
docker volume ls -qf "dangling=true" | xargs docker volume rm

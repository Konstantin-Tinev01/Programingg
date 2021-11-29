<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create room</title>
</head>
<body>
    <div>
        <div>
            <h1></h1>
            <form action="{{ route('create_room_api') }}" method="post">
                <input type="number" name="room_number" id="room_number" min="1000">
                <input type="text" name="type_of_room" id="type_of_room">
                <!--<input type="text" name="money_per_week" id="money_per_week">-->
                <input type="number" name="count_of_desks" id="count_of_desks">
                <input type="text" name="room_manager" id="room_manager">
                <input type="number" name="id_of_room_manager" id="id_of_room_manager">
                <input type="submit" name="submit_button" id="submit_button">
            </form>
        </div>
    </div>
</body>
</html>
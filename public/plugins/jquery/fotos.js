$.ajax({
    url: 'https://randomuser.me/api/?results=2',
    dataType: 'json',
    type: 'GET',
    success: function(data) {
        console.log(data);
        var users = data["results"];
        console.log(users);
        console.log(users.length);
        for (var i = 0; i < users.length; i++) {
            var user = users[i];
            var img = users[i]["picture"]["large"];
            var name = users[i]["name"]["first"];
            var last_name = users[i]["name"]["last"];
            var user_email = users[i]["email"];
            console.log(img);
            console.log(user.email);
            var id = i + 1;

            $("#img_" + id).attr("src", img);
            $("#name_" + id).attr('value', name + ' ' + last_name);
            $("#email_" + id).html('<strong>' + user.email + '</strong>');


        }
    }
});
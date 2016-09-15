var artist_name_url = artist_name.replace(' ', '+');

function edit(){
    if(confirm("Do you know more about " + artist_name +"? Go to edit page?")){
        location.href = "edit.php?artist_name=" + artist_name_url;
    }
}

function submit(){
    var artist_name_url = artist_name.replace(' ', '+');
    var update_genres = (document.getElementById("textarea-genre").value !== null ? 
        document.getElementById("textarea-genre").value : '' );
    var update_about = (document.getElementById("textarea-about").value !== null?
        document.getElementById("textarea-about").value : '');
    var update_signature_song = (document.getElementById("textarea-signature-song").value !== null?
        document.getElementById("textarea-signature-song").value : '');
    var update_about_signature_song = (document.getElementById("textarea-about-signature-song").value !== null?
        document.getElementById("textarea-about-signature-song").value : '');
   
    var passing_data = [artist_name, update_genres, update_about, update_signature_song, update_about_signature_song];
   
    var display_text = "Add following information to datebase\n\
                        Genre: " + update_genres + "\n\
                        About: " + update_about + "\n\
                        Signature Song: " + update_signature_song + "\n\
                        About the Song: " + update_about_signature_song;
    
    if(confirm(display_text)){
//  can't make the ajax working...
//        $.ajax({
//                url:"update_db.php",
//                data:{"passing-data": JSON.stringify(passing_data)},
//                datatype: "json",
//                contentType: 'application/json',
//                type: "post",
//                success: function(){
//                    location.href = "artist_detail.php?artist_name=" + artist_name_url;
//                    //location.href = "update_db.php";
//                },
//                error: {
//                    
//                }
//            });
    $.post("update_db.php", {
        'artist-name':artist_name,
        'update-about': update_about,
        'update-genres': update_genres,
        'update-signature-song': update_signature_song,
        'update_about-signature_song': update_about_signature_song
    }).done(function( data ) {
    location.href = "artist_detail.php?artist_name=" + artist_name_url;
});

}}

function login(){
    location.href = "login.php";
}
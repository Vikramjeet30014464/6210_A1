
  $(document).ready(function(){

         hid = $('#hid').attr('src');
         console.log(hid);
         $('#SCPimage').attr('src',hid);
         $('img[src=""]').css("visibility", "hidden");

         
$("form#data").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: 'upload.php',
        type: 'POST',
        data: formData,
        success: function (data) {
            alert(data);

        },
        cache: false,
        contentType: false,
        processData: false
    });
});

        
$("a#create").click(function(){
  $("#create").css("visibility", "hidden");
  $("#save").attr("type", "submit");
  $("#update").attr("type", "hidden");
  $("textarea").removeAttr("disabled");
  $("input").removeAttr("disabled");
  $("#update").remove();
  $("#01").focus();

});

  $("button.modify").click(function(){
    scpid = $(this).val();
    $("textarea").removeAttr("disabled");
    $("input").removeAttr("disabled");
    $("#update").attr("type", "submit");
    $("#create").css("visibility", "hidden");
    $("#save").attr("type", "hidden");
    $("#save").remove();
    $.post("modify.php",
    {
      edit: scpid
    },
    function(data,status){
     
      $("#editDataTable").removeClass("hidden");
      var myArray = JSON.parse(data);
      console.log(myArray)
      $("input#01").val(myArray[1]);
      $("textarea#02").html(myArray[2]);
      $("textarea#03").html(myArray[3]);
      $("textarea#04").html(myArray[4]);
      $("textarea#05").html(myArray[5]);
      $("textarea#06").html(myArray[6]);
      $("textarea#07").html(myArray[7]);
      $("textarea#08").html(myArray[8]);

    });
  });


});

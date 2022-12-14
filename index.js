
function getJson(){
  var appid = $("#appid").val();
  var appkey = $("#appkey").val();
  var shortCode = $("#shortcode").val();
  var api = $("#api").val();
  var notifyUrl = $("#notifyurl").val();
  var returnUrl = $("#returnurl").val();
  var timeout = $("#timeout").val();
  var receiveName = $("#reciver").val();
  var publicKey = $("#publickey").val();
  var subject = $("#subject").val();
  var amount = $("#amount").val(); 
  $.post(
    "getJson.php",{
      appid: appid,
      api:api,
      publicKey:publicKey,
      appkey:appkey,
      subject:subject,
      shortCode: shortCode,
      notifyUrl: notifyUrl,
      returnUrl: returnUrl,
      receiveName: receiveName,
      amount: amount,
      timeout: timeout,
    },
    function(data){
      var jsonPretty = JSON.stringify(JSON.parse(data.data),null,2);
      $("#jsondata").val(jsonPretty);
    }
  );
}

function requestTele(){
  var reqMessage = $("#jsondata").val();
  var api = $("#api").val();
  if(!reqMessage){
    window.alert("please get json for postman first");
  }else{
    $.post(
      "requestTele.php",
      {
        reqMessage: reqMessage,
        api:api
      },
      function(data){
        var jsonPretty = JSON.stringify(JSON.parse(data.data),null,2); 
        var payUrl = data.payurl;
        doStuff(payUrl);
        $("#jsondata").val(jsonPretty);
        // get topay url
      }
    );
  }
}

function doStuff(url){
  $("h5").last().html("Data from Telebirr");
  $("button").last().removeClass("hidden")
  $("button").last().attr("onclick","window.open('"+url+"','_blank')")
}
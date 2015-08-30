function test(){
  alert('HALO CAST');
}

function register(jsonData, callback){
      $.ajax({
        url: '../api/user/register.php',
        type: "POST",
        data: jsonData,
        error: function() {
          //  alert('failure');
        },
        success: function(data) {
          if (callback) callback(data);
        }
      });
}

function login(jsonData, callback){
  $.ajax({
    url: '../api/user/login.php',
    type: "POST",
    data: jsonData,
    error: function() {
      //  alert('failure');
    },
    success: function(data) {
      if (callback) callback(data);
    }
  });
}

function getUserInfo(jsonData, callback){
  $.ajax({
    url: '../api/user/getUserInfo.php',
    type: "POST",
    data: jsonData,
    error: function() {
      //  alert('failure');
    },
    success: function(data) {
      if (callback) callback(data);
    }
  });
}

function updateUserInfo(jsonData, callback){
  $.ajax({
    url: '../api/user/userUpdate.php',
    type: "POST",
    data: jsonData,
    error: function() {
        //  alert('failure');
    },
    success: function(data) {
      if (callback) callback(data);
    }
  });
}

function newGoods(jsonData, callback){
  $.ajax({
    url: '../api/goods/newGoods.php',
    type: "POST",
    data: jsonData,
    error: function() {
          //  alert('failure');
    },
    success: function(data) {
      if (callback) callback(data);
    }
  });
}

function getGoodsInfo(jsonData, callback){
  $.ajax({
    url: '../api/goods/getGoodsInfo.php',
    type: "POST",
    data: jsonData,
    error: function() {
            //  alert('failure');
    },
    success: function(data) {
        if (callback) callback(data);
    }
  });
}

function getGoodsList(jsonData, callback){
  $.ajax({
    url: '../api/goods/getGoodsList.php',
    type: "POST",
    data: jsonData,
    error: function() {
              //  alert('failure');
            },
    success: function(data) {
              if (callback) callback(data);
            }
    });
  }

function getMyGoodsListCreated(callback){
  $.ajax({
    url: '../api/goods/getMyGoodsListCreated.php',
    type: "POST",
    error: function() {
                //  alert('failure');
    },
    success: function(data) {
      if (callback) callback(data);
    }
  });
}

function getMyGoodsListReserved(callback){
  $.ajax({
    url: '../api/goods/getMyGoodsListReserved.php',
    type: "POST",
    error: function() {
                  //  alert('failure');
    },
    success: function(data) {
      if (callback) callback(data);
    }
  });
}

function newReserve(jsonData, callback){
  $.ajax({
    url: '../api/reserve/newReserve.php',
    type: "POST",
    data: jsonData,
    error: function() {
                  //  alert('failure');
    },
    success: function(data) {
      if (callback) callback(data);
    }
  });
}

function getReserveList(jsonData, callback){
  $.ajax({
    url: '../api/reserve/getReserveList.php',
    type: "POST",
    data: jsonData,
    error: function() {
                  //  alert('failure');
    },
    success: function(data) {
      if (callback) callback(data);
    }
  });
}

function getReserveSum(jsonData, callback){
  $.ajax({
    url: '../api/reserve/getReserveSum.php',
    type: "POST",
    data: jsonData,
    error: function() {
                  //  alert('failure');
    },
    success: function(data) {
      if (callback) callback(data);
    }
  });
}

function init_upload(formID, callback){
  var jqID = '#' + formID;

  $(jqID).fileupload({
      add: function (e, data) {
          var jqXHR = data.submit();
      },
      progress: function(e, data){
          var progress = parseInt(data.loaded / data.total * 100, 10);

          if(progress == 100){
            path = "upload/" + data.files[0].name;
            if (callback) callback(path);
          }
      },
      fail:function(e, data){
          // Something has gone wrong!
      }
  });

  return;
}


var randomNumber = Math.floor(Math.random()* 100  )+ 1;

function tryMe() {
  var enternum = numEnter.value;
  while (true) {
    if (enternum == randomNumber) {
        window.alert("congratulations you got it right , number is " + randomNumber);
        break;

    } else if (enternum < randomNumber) {
            window.alert("num have entered too small !  "+ randomNumber);
            break;

          }
    else if (enternum > randomNumber){
            window.alert("num have entered too big ! "+ randomNumber);
            break;
          }
          else {
            window.alert("error");
            break;
          }
  }
      }

document.getElementById("start_exam").addEventListener("click",fullScreen);
    function fullScreen(){
        document.documentElement.requestFullscreen().catch((e)=>{
            console.log(e);
        });

        }



  function closeFullscreen() {
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.webkitExitFullscreen) { /* Safari */
        document.webkitExitFullscreen();
      } else if (document.msExitFullscreen) { /* IE11 */
        document.msExitFullscreen();
      }
    }

    document.getElementById("ctrl_keys").addEventListener('keydown', event => {
  if ((event.ctrlKey && 'cvtxspwuazr').indexOf(event.key) !== -1) {
    event.preventDefault()
  }

  })
        
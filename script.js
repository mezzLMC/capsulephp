  document.getElementById('page').onscroll = function(){
    if($('#page')){
    if ($('#page').scrollTop() >= document.getElementById("app").offsetTop - 150){
      document.getElementById('stickyheader').classList.remove('nosticky')
      document.getElementById('stickyheader').classList.add('sticky')
    }
    else{
      document.getElementById('stickyheader').classList.add('nosticky')
      document.getElementById('stickyheader').classList.remove('sticky')
    }
  }
  }

  let stack = document.querySelector(".stack");
        [...stack.children].reverse().forEach(i => stack.append(i));
        stack.addEventListener("click", function(e){
          let card = document.querySelector(".card:last-child");
          if (e.target !== card) return;
          card.style.animation = "swap 700ms forwards";
          setTimeout(() => {
            card.style.animation = "";
            stack.prepend(card);
          }, 700);
        });
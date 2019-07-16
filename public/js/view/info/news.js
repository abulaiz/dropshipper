function news(e){
      this.prev = e.children[0].children[0]
      this.next = e.children[0].children[1]
      this.slideIndex = 1
      this.e = e
      this.images = []
      this.dots = []
      var self = this;

      this.init = function(){
         this.images = this.getImages(e.children[0])
         this.dots = this.setDots(e.children[1])
         this.showSlides(1);
      }

      $(this.next).click(function(){
         self.plusSlides(1);
      })

      $(this.prev).click(function(){
         self.plusSlides(-1); 
      })

      this.showSlides = function(n) {
         if (n > this.images.length) {this.slideIndex = 1}

         if (n < 1) {this.slideIndex = this.images.length}
         
         for (i = 0; i < this.images.length; i++) {
            this.images[i].style.display = "none";  
         }
         
         for (i = 0; i < this.dots.length; i++) {
            this.dots[i].className = this.dots[i].className.replace(" active-dot", "");
         }
         
         this.images[this.slideIndex-1].style.display = "block";  
         this.dots[this.slideIndex-1].className += " active-dot";
      }

      this.plusSlides = function (n) {
        this.showSlides(this.slideIndex += n);
      }

      this.currentSlide = function (n) {
        this.showSlides(this.slideIndex = n);
      }

      this.getImages = function(e){
         let x = [];
         for(let i = 2; i < e.children.length; i++){
            x.push( e.children[i] );
         }
         return x;
      }

      this.setDots = function(e){
         let x = [];
         var n = this;
         for(let i = 0; i < this.images.length; i++){
            $(e).append("<span class='dot'></span>");
            $(e.children[i]).click(function(){
               var index = i + 1;
               n.currentSlide(index);
            });
            x.push(e.children[i]);
         }
         return x;
      }   
}
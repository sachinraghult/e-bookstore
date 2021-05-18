  </div>
  <footer>
    <svg viewBox="0 0 120 28">
    <defs> 
        <filter id="goo">
          <feGaussianBlur in="SourceGraphic" stdDeviation="0" result="blur" />
          <feColorMatrix in="blur" mode="matrix" values="
              1 0 0 0 0  
              0 1 0 0 0  
              0 0 1 0 0  
              0 0 0 13 -9" result="goo" />
          <xfeBlend in="SourceGraphic" in2="goo" />
        </filter>
        <path id="wave" d="M 0,10 C 30,10 30,15 60,15 90,15 90,10 120,10 150,10 150,15 180,15 210,15 210,10 240,10 v 28 h -240 z" />
      </defs> 

      <use id="wave3" class="wave" xlink:href="#wave" x="0" y="-2" ></use> 
      <use id="wave2" class="wave" xlink:href="#wave" x="0" y="0" ></use>
      
    <g class="topball" id="scrollToTopBtn">
      <circle class="ball" cx="110" cy="8" r="4" stroke="none" stroke-width="0" fill="red" />

        <g class="arrow">
        <polyline class="" points="108,8 110,6 112,8" fill="none"  />
        <polyline class="" points="110,6 110,10.5" fill="none"  />
        </g>
        
      </g>
    
      <g class="gooeff" filter="url(#goo)">
      <circle class="drop drop1" cx="20" cy="2" r="8.8"  />
      <circle class="drop drop2" cx="25" cy="2.5" r="7.5"  />
      <circle class="drop drop3" cx="16" cy="2.8" r="9.2"  />
      <circle class="drop drop4" cx="18" cy="2" r="8.8"  />
      <circle class="drop drop5" cx="22" cy="2.5" r="7.5"  />
      <circle class="drop drop6" cx="26" cy="2.8" r="9.2"  />
      <circle class="drop drop1" cx="5" cy="4.4" r="8.8"  />
      <circle class="drop drop2" cx="5" cy="4.1" r="7.5"  />
      <circle class="drop drop3" cx="8" cy="3.8" r="9.2"  />
      <circle class="drop drop4" cx="3" cy="4.4" r="8.8"  />
      <circle class="drop drop5" cx="7" cy="4.1" r="7.5"  />
      <circle class="drop drop6" cx="10" cy="4.3" r="9.2"  />
      
      <circle class="drop drop1" cx="1.2" cy="5.4" r="8.8"  />
      <circle class="drop drop2" cx="5.2" cy="5.1" r="7.5"  />
      <circle class="drop drop3" cx="10.2" cy="5.3" r="9.2"  />
        <circle class="drop drop4" cx="3.2" cy="5.4" r="8.8"  />
      <circle class="drop drop5" cx="14.2" cy="5.1" r="7.5"  />
      <circle class="drop drop6" cx="17.2" cy="4.8" r="9.2"  />
      <use id="wave1" class="wave" xlink:href="#wave" x="0" y="1" />
    </g>  

    </svg>

      <div>Made with Love - by Three Idiots</div>
    </footer>

      <style>
       @import url("https://fonts.googleapis.com/css?family=Lato:400,400i,700");

      body {
        font-family: Lato, sans-serif;
        --col-deepblue: #4478e3;
      }

      main {
        height: 200vmin
      }

      footer {
        width:99vw;
        bottom:0px
      }
      footer div {
        background-color:#4478e3;
        margin: -6px 0px 0px 0px;
        padding:0px;
        color: #fff;
        text-align:center;
      }
      svg {
        width:100%;
      }
      .arrow {
        stroke-width: .3px;
        stroke:yellow;
      }
      .topball {
        animation: ball 1.5s ease-in-out;
        animation-iteration-count:infinite;
        animation-direction: alternate;
        animation-delay: 0.3s;
        cursor:pointer;
      }

      .wave {
        animation: wave 3s linear;
        animation-iteration-count:infinite;
        fill: #4478e3;
      }
      .drop {
        fill: var(--col-deepblue);
        xfill: #99000055;
        animation: drop 3.2s linear infinite normal;
        stroke: var(--col-deepblue);
        stroke-width:0.5;
        transform: translateY(25px) ;
        transform-box: fill-box;
        transform-origin: 50% 100%;
      }
      .drop1 {
        
      }
      .drop2 {
        animation-delay: 3s;
        animation-duration:3s;
      }
      .drop3 {
        animation-delay: -2s;
        animation-duration:3.4s;
      }
      .drop4 {
        animation-delay: 1.7s;
      }
      .drop5 {
        animation-delay: 2.7s;
        animation-duration:3.1s;
      }
      .drop6 {
        animation-delay: -2.1s;
        animation-duration:3.2s;
      }
      .gooeff {
          filter: url(#goo);
      }
      #wave2 {
        animation-duration:5s;
        animation-direction: reverse;
        opacity: .6
      }
      #wave3 {
        animation-duration: 7s;
        opacity:.3;
      }
      @keyframes drop {
        0% {
          transform: translateY(25px); 
        }
        30% {
          transform: translateY(-10px) scale(.1);
        }
        30.001% {
          transform: translateY(25px) scale(1); 
        }
        70% {
          transform: translateY(25px); 
        }
        100% { 
          transform: translateY(-10px) scale(.1);  
        }
      }
      @keyframes wave {
        to {transform: translateX(-100%);}
      }
      @keyframes ball {
        to {transform: translateY(20%);}
      }

      </style>

      <script>
        var scrollToTopBtn = document.getElementById("scrollToTopBtn")
        var rootElement = document.documentElement
        function scrollToTop() {
          rootElement.scrollTo({
            top: 0,
            behavior: "smooth"
          })
        }
        scrollToTopBtn.addEventListener("click", scrollToTop)
      </script>
  </body>
</html>
document.addEventListener("DOMContentLoaded",()=>{const v={threshold:.1,rootMargin:"0px 0px -50px 0px"},m=new IntersectionObserver(e=>{e.forEach(t=>{t.isIntersecting&&(t.target.classList.add("visible"),t.target.querySelectorAll(".menu-card").forEach((n,r)=>{n.style.animationDelay=`${r*.08}s`,n.classList.add("animate")}))})},v);document.querySelectorAll(".menu-section, .info-banner").forEach(e=>{m.observe(e)});const l=document.querySelectorAll(".nav-pill"),d=document.querySelectorAll(".menu-section"),b=new IntersectionObserver(e=>{e.forEach(t=>{if(t.isIntersecting){const o=t.target.getAttribute("id");l.forEach(n=>{n.classList.toggle("active",n.dataset.category===o)})}})},{threshold:.3,rootMargin:"-100px 0px -50% 0px"});d.forEach(e=>{b.observe(e)}),l.forEach(e=>{e.addEventListener("click",t=>{t.preventDefault();const o=e.getAttribute("href").substring(1),n=document.getElementById(o);n&&n.scrollIntoView({behavior:"smooth",block:"start"})})}),document.querySelectorAll(".menu-card").forEach(e=>{e.addEventListener("mousemove",t=>{const o=e.getBoundingClientRect(),n=t.clientX-o.left,r=t.clientY-o.top,i=o.width/2,s=o.height/2,y=(r-s)/20,k=(i-n)/20;e.style.transform=`translateY(-6px) perspective(1000px) rotateX(${y}deg) rotateY(${k}deg)`}),e.addEventListener("mouseleave",()=>{e.style.transform=""})});const h=document.querySelector(".menu-nav"),f=document.querySelector(".hero"),a=(()=>{const e=document.createElement("div");return e.className="sticky-nav",e.innerHTML=h.innerHTML,document.body.appendChild(e),e.querySelectorAll(".nav-pill").forEach(t=>{t.addEventListener("click",o=>{o.preventDefault();const n=t.getAttribute("href").substring(1),r=document.getElementById(n);r&&r.scrollIntoView({behavior:"smooth",block:"start"})})}),e})(),p=document.createElement("style");p.textContent=`
        .sticky-nav {
            position: fixed;
            top: -70px;
            left: 0;
            right: 0;
            z-index: 900;
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            justify-content: center;
            padding: 12px 20px;
            background: rgba(62, 36, 21, 0.95);
            backdrop-filter: blur(12px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            transition: top 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .sticky-nav.visible {
            top: 0;
        }
        .sticky-nav .nav-pill {
            padding: 6px 16px;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 600;
            color: rgba(255, 245, 220, 0.8);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.15);
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
        }
        .sticky-nav .nav-pill:hover,
        .sticky-nav .nav-pill.active {
            background: rgba(31, 122, 63, 0.9);
            color: #fff;
            border-color: rgba(31, 122, 63, 0.5);
        }
        @media (max-width: 768px) {
            .sticky-nav {
                gap: 4px;
                padding: 8px 12px;
            }
            .sticky-nav .nav-pill {
                padding: 4px 10px;
                font-size: 0.75rem;
            }
        }
    `,document.head.appendChild(p),new IntersectionObserver(e=>{e.forEach(t=>{t.isIntersecting?a.classList.remove("visible"):a.classList.add("visible")})},{threshold:0}).observe(f);const g=new IntersectionObserver(e=>{e.forEach(t=>{if(t.isIntersecting){const o=t.target.getAttribute("id");a.querySelectorAll(".nav-pill").forEach(r=>{r.classList.toggle("active",r.dataset.category===o)})}})},{threshold:.3,rootMargin:"-100px 0px -50% 0px"});d.forEach(e=>{g.observe(e)});const c=document.querySelector(".hero-scroll-indicator");c&&(c.addEventListener("click",()=>{const e=document.querySelector(".menu-section");e&&e.scrollIntoView({behavior:"smooth",block:"start"})}),c.style.cursor="pointer");const x=()=>{const e=document.createElement("div"),t=Math.random()*6+2,o=Math.random()*100,n=Math.random()*10+15,r=Math.random()*10;e.style.cssText=`
            position: fixed;
            width: ${t}px;
            height: ${t}px;
            background: rgba(232, 184, 48, ${Math.random()*.15+.05});
            border-radius: 50%;
            left: ${o}%;
            top: 100%;
            z-index: -1;
            pointer-events: none;
            animation: particle-float ${n}s ${r}s linear infinite;
        `,document.body.appendChild(e)},u=document.createElement("style");u.textContent=`
        @keyframes particle-float {
            0% { transform: translateY(0) rotate(0deg); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-110vh) rotate(720deg); opacity: 0; }
        }
    `,document.head.appendChild(u);for(let e=0;e<8;e++)x();document.querySelectorAll(".pizza-collapse-toggle").forEach(e=>{const t=e.classList.contains("juice-collapse-toggle"),o=t?"Ver opções e preços":"Ver tamanhos e preços",n=t?"Ocultar opções":"Ocultar tamanhos";e.addEventListener("click",()=>{const r=e.getAttribute("aria-expanded")==="true",i=e.getAttribute("aria-controls"),s=document.getElementById(i);s&&(r?(e.setAttribute("aria-expanded","false"),s.classList.remove("open"),e.querySelector(".pizza-collapse-toggle-text").textContent=o):(e.setAttribute("aria-expanded","true"),s.classList.add("open"),e.querySelector(".pizza-collapse-toggle-text").textContent=n))})})});

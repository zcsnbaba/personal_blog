//helper
function L(c,a){ return a ? document.querySelectorAll(c) : document.querySelector(c) }
function C(c, a, f){
    if(a){
        return f ? f.getElementsByClassName(c) : document.getElementsByClassName(c);
    }else{
        return f ? f.getElementsByClassName(c)[0] : document.getElementsByClassName(c)[0];
    }
}
function I (e) {
    return document.getElementById(e);
}
function fIn(d,o){
    d.classList.remove('fadeOut');
    o ? d.classList.add('fadeIn' + o) : d.classList.add('fadeIn');
}
function fOut(d,o){
    o ? d.classList.remove('fadeIn' + o) : d.classList.remove('fadeIn');
    d.classList.add('fadeOut');
}
function contains(f, c){
    return f.contains ? f !== c && f.contains(c) : !!(f.compareDocumentPosition(c) & 16);
}
function verHover(e, t){
    var r = e.type === 'mouseover' ? e.relatedTarget || e.fromElement : e.relatedTarget || e.toElement;
    return !contains(t, r) && t !== r;
}
function msDlg(e, p, c){
    e = e || window.event;
    var t = e.target || e.srcElement;
    while(t !== p){
        if((' ' + t.className + ' ').indexOf(' ' + c + ' ') !== -1 && verHover(e, t)){
            return t;
        }
        t = t.parentNode;
    }
    return false;
}
//underline
(function(){
    var i = 0, s = C('sonCateA',true), l = s.length , h = location.href;
    for(;i < l;i++){
        if(s[i].href === h){
            C('CateLists',true)[2].classList.add('active');
            break;
        }
    }
})();
//onClick
(function(){
    var wc = C('weChat'), wm = C('wcMask'), qq = C('qq'), qm = C('qqMask');
    function entrust(e,dom,mask){
        e = e || window.event;
        var t = e.target || e.srcElement;
        if(t.nodeName !== 'IMG'){
            fOut(dom);
            fOut(mask,'s');
        }
    }
    C('wcIcon').onclick = function(){
        fIn(wc);
        fIn(wm, 's')
    };
    wc.onclick = function(e){ entrust(e, wc, wm) };
    C('qqIcon').onclick = function(){
        fIn(qq);
        fIn(qm, 's')
    };
    qq.onclick = function(e){ entrust(e, qq, qm) };
    C('goTop').onclick = function(){
        var y = pageYOffset, s = y / 30;
        var t = setInterval(function(){
            y -= s;
            if(y > 0){
                window.scrollTo(0,y);
            }else{
                window.scrollTo(0,0);
                clearInterval(t);
            }
        },10);
    };
})();
//menuHover
(function(){
    var u = C('navbar-nav'), timer = null;
    u.onmouseover = function(e){
        var t = msDlg(e, u, 'CateLists');
        if(t){
            if(t.children.length > 2){
                if(timer){
                    clearInterval(timer);
                }
                timer = null;
                C('Triangle', false, t).classList.add('taHover');
                C('SonCate', false, t).classList.add('scHover');
            }
        }
    };
    u.onmouseout = function(e){
        var t = msDlg(e, u, 'CateLists');
        if(t){
            if(t.children.length > 2){
                timer = setTimeout(function(){
                    C('Triangle', false, t).classList.remove('taHover');
                    C('SonCate', false, t).classList.remove('scHover');
                }, 1000)
            }
        }
    };
})();
//scroll
(function(){
    var s = 0, o = 0, g = C("goTop"), h = document.documentElement.clientHeight;
    //throttle
    function throttle(func, wait, mustRun) {
        var timeout,
            startTime = new Date();
        return function() {
            var context = this,
                args = arguments,
                curTime = new Date();
            clearTimeout(timeout);
            //runHandler
            if(curTime - startTime >= mustRun){
                func.apply(context,args);
                startTime = curTime;
            }else{
                //resetTimeout
                timeout = setTimeout(func, wait);
            }
        };
    }
    //handler
    function realFunc(){
        var y = window.pageYOffset;
        if(y > 500 && s === 0){
            g.classList.add("showTop");
            s = 1;
        }
        if(y <= 500 && s === 1){
            g.classList.remove("showTop");
            s = 0;
        }
        //lazyLoad
        if(o === 0){
            var p = C('lazyLoad',true), l = p.length;
            if(l !== 0){
                var i = 0, d = null;
                for(;i < l;i++){
                    d = p[i];
                    if(d.getBoundingClientRect().top - h < y){
                        (function(d){
                            var s = d.getAttribute('data-src');
                            var g = new Image();
                            g.src = s;
                            g.onload = function(){
                                d.src = s;
                                d.classList.remove('lazyLoad');
                                var k = d.nextElementSibling;
                                if(k && k.className === 'spinner'){ k.parentNode.removeChild(k); }
                                if(d.classList.contains('slOut')){
                                    setTimeout(function(){
                                        d.classList.remove('slOut');
                                    }, 300);
                                }
                            };

                        })(d);
                    }
                }
            }else{
                o = 1;
            }
        }
    }
    //采用节流函数
    window.addEventListener('scroll',throttle(realFunc,250,250));
})();

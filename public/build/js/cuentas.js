!function(){let e=[],t=[],a=[];!async function(){try{if(url="/cuentas/compradas",respuesta=await fetch(url),resultado=await respuesta.json(),resultado.error)return;e=resultado.cuentas.sort(((e,t)=>e.fecha.toLowerCase()>t.fecha.toLowerCase()?-1:e.fecha.toLowerCase()<t.fecha.toLowerCase()?1:0)),t=e,a=resultado.plataformas,function(){const n=document.querySelector("#tbody"),o={1:{name:"streaming"},2:{name:"videojuegos"},3:{name:"recargas"}};if(0===e.length){const e=document.querySelector(".cuentas"),t=document.createElement("P");return t.textContent="Aún no ha adquirido cuentas",t.classList.add("no-cuentas"),void e.appendChild(t)}(t.length?t:e).forEach((e=>{const t=document.createElement("TR"),c=document.createElement("TD"),d=document.createElement("TD"),s=document.createElement("TD");a.forEach((a=>{const n=o[a.categoria];if(a.id===e.plataformaid){const e=document.createElement("TD"),o=document.createElement("IMG");o.src=`/imagenes/${n.name}/${a.imagen}`,o.classList.add("plataforma-img"),e.appendChild(o),d.appendChild(e),c.textContent=a.plataforma,c.classList.add("plataforma"),s.textContent=`$ ${a.precio}`,t.appendChild(d),t.appendChild(c),t.appendChild(s)}}));const r=document.createElement("TD");r.classList.add("usuario"),r.textContent=e.usuario;const l=document.createElement("TD");l.textContent=e.clave;const i=document.createElement("TD");i.classList.add("perfil"),"5"!=e.perfil?i.textContent=e.perfil:i.textContent="Cuenta Completa";const m=document.createElement("TD");m.classList.add("pin"),""!=e.pin?m.textContent=e.pin:m.textContent="No aplica";const p=document.createElement("TD");p.classList.add("fecha"),p.textContent=e.fecha,t.appendChild(r),t.appendChild(l),t.appendChild(i),t.appendChild(m),t.appendChild(p),n.appendChild(t)}))}()}catch(e){console.log(e)}}()}();
!function(){let e=[],t=[];!async function(){try{if(url="/cuentas",respuesta=await fetch(url),resultado=await respuesta.json(),resultado.error)return;console.log(resultado),e=resultado.cuentas,t=resultado.plataformas,function(){const a=document.querySelector("#tbody"),n={1:{name:"streaming"},2:{name:"videojuegos"},3:{name:"recargas"}};e.forEach((e=>{const o=document.createElement("TR"),c=document.createElement("TD"),d=document.createElement("TD"),l=document.createElement("TD");t.forEach((t=>{const a=n[t.categoria];if(t.id===e.plataformaid){const e=document.createElement("IMG");e.src=`/imagenes/${a.name}/${t.imagen}`,e.classList.add("plataforma-img"),d.appendChild(e),c.textContent=t.plataforma,c.classList.add("plataforma"),l.textContent=`$ ${t.precio}`,o.appendChild(d),o.appendChild(c),o.appendChild(l)}}));const s=document.createElement("TD");s.classList.add("usuario"),s.textContent=e.usuario;const r=document.createElement("TD");r.textContent=e.clave;const i=document.createElement("TD");i.classList.add("perfil"),"5"!=e.perfil?i.textContent=e.perfil:i.textContent="Cuenta Completa";const p=document.createElement("TD");p.classList.add("pin"),""!=e.pin?p.textContent=e.pin:p.textContent="No aplica";const m=document.createElement("TD");m.classList.add("fecha"),m.textContent=e.fecha,o.appendChild(s),o.appendChild(r),o.appendChild(i),o.appendChild(p),o.appendChild(m),a.appendChild(o)}))}()}catch(e){console.log(e)}}()}();
!function(){let e=[],t=[],n=[];!async function(){try{const a="/cuentas",o=await fetch(a),c=await o.json();console.log(c),e=c.cuentas.sort(((e,t)=>e.fecha.toLowerCase()<t.fecha.toLowerCase()?-1:e.fecha.toLowerCase()>t.fecha.toLowerCase()?1:0)),t=c.plataformas,n=c.usuarios,function(){const a=document.querySelector("#tbody");if(0===e.length){const e=document.querySelector(".cuentas"),t=document.createElement("P");return t.textContent="Aún no ha creado cuentas",t.classList.add("no-cuentas"),void e.appendChild(t)}e.forEach((e=>{const o=document.createElement("TR"),c=document.createElement("TD"),d=document.createElement("TD"),i=document.createElement("TD"),l=document.createElement("TD"),r=document.createElement("TD"),u=document.createElement("TD"),p=document.createElement("TD"),m=document.createElement("TD"),s=document.createElement("TD");c.textContent=e.usuario,d.textContent=e.clave,i.textContent=""!==e.pin?e.pin:"No Aplica",l.textContent="5"!==e.perfil?"Perfil "+e.perfil:"Cuenta Completa",r.textContent="1"===e.estado?"Activa":"Inactiva",u.textContent=e.fecha,p.textContent=e.vigencia,m.textContent=n.find((t=>t.id===e.usuarioid))?.email||e.usuarioid,s.textContent=t.find((t=>t.id===e.plataformaid))?.plataforma||e.plataformaid,o.appendChild(c),o.appendChild(d),o.appendChild(i),o.appendChild(l),o.appendChild(r),o.appendChild(u),o.appendChild(p),o.appendChild(m),o.appendChild(s),a.appendChild(o)}))}()}catch(e){console.log(e)}}()}();
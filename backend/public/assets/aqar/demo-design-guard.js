// Demo-only navigation guard. The design archive is for manager presentations.
const key='aqar.interactive.v2';
try {
  const state=JSON.parse(localStorage.getItem(key)||'null');
  const session=JSON.parse(sessionStorage.getItem(`${key}.session`)||localStorage.getItem(`${key}.session`)||'null');
  const user=session?.expiresAt>Date.now()?state?.accounts.find(a=>a.id===session.accountId):null;
  if(user?.role==='manager')document.documentElement.style.visibility='visible';
  else location.replace(!user?'/login':user.role==='owner'?'/owner':'/tenant');
}catch{location.replace('/login');}

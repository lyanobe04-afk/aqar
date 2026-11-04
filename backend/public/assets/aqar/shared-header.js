const escape = value => String(value ?? '').replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
export function headerMarkup({languages,locale,t,userName,role,notifications,unread,profileUrl,logoutUrl,notificationsUrl}) {
 const h=escape, icon=name=>`<span class="material-symbols-outlined" aria-hidden="true">${name}</span>`;
 const control=(key,label,content)=>`<button type="button" class="aqar-header-control" data-header-toggle="${key}" id="header-${key}-trigger" aria-label="${h(t(label))}" aria-haspopup="${key==='notifications'?'dialog':'menu'}" aria-expanded="false" aria-controls="header-${key}">${content}</button>`;
 const panel=(key,label,content,role='menu')=>`<div class="aqar-header-panel" id="header-${key}" ${role==='menu'?'role="menu"':'role="dialog"'} aria-label="${h(t(label))}" hidden>${content}</div>`;
 return `<div class="aqar-header-tools">
 <div class="aqar-header-menu">${control('language','Language',icon('language')+icon('expand_more'))}${panel('language','Language',Object.entries(languages).map(([code,label])=>`<button type="button" role="menuitemradio" aria-checked="${locale===code}" data-header-language="${h(code)}" lang="${h(code)}" dir="auto"><span>${h(label)}</span>${locale===code?icon('check'):''}</button>`).join(''))}</div>
 ${profileUrl?`<div class="aqar-header-menu">${control('notifications',t('Notifications')+(unread?` · ${unread} ${t('Unread')}`:''),`<span class="aqar-unread-bell ${unread?'has-unread':''}">${icon('notifications')}</span>`+(unread?`<span class="aqar-header-badge" aria-hidden="true">${unread>99?'99+':unread}</span>`:''))}${panel('notifications','Notifications',`<div class="aqar-header-panel-title"><strong>${h(t('Notifications'))}</strong><span>${unread} ${h(t('Unread'))}</span></div><div class="aqar-header-notifications">${notifications.length?notifications.slice(0,4).map(n=>`<article class="aqar-header-notification ${n.read?'':'is-unread'}"><span class="aqar-notification-dot" aria-hidden="true"></span><div><p>${h(t(n.title))}</p>${n.read?`<small>${h(t('Read'))}</small>`:`<button type="button" data-header-read="${h(n.id)}" aria-label="${h(t('Mark as read')+': '+t(n.title))}">${h(t('Mark as read'))}</button>`}</div></article>`).join(''):`<p class="aqar-header-empty">${h(t('No notifications yet'))}</p>`}</div><a class="aqar-header-view-all" href="${h(notificationsUrl)}">${h(t('View all notifications'))}${icon('arrow_forward')}</a>`,'dialog')}</div>
 <div class="aqar-header-menu">${control('profile','Account menu',icon('account_circle')+icon('expand_more'))}${panel('profile','Account menu',`<div class="aqar-header-account"><strong>${h(userName)}</strong><small>${h(t(role))}</small></div><a role="menuitem" href="${h(profileUrl)}">${icon('person')}${h(t('View profile'))}</a><a role="menuitem" class="aqar-header-logout" href="${h(logoutUrl)}">${icon('logout')}${h(t('Log out'))}</a>`)}</div>`:''}</div>`;
}
export function bindHeader(host,{onLanguage,onRead}) {
 host.headerAbort?.abort();const abort=new AbortController();host.headerAbort=abort;const options={signal:abort.signal};
 let opened=null;
 const close=(restore=false)=>{if(!opened)return;const trigger=host.querySelector(`[data-header-toggle="${opened}"]`);host.querySelector(`#header-${opened}`).hidden=true;trigger.setAttribute('aria-expanded','false');opened=null;if(restore)trigger.focus();};
 const items=panel=>[...panel.querySelectorAll('button:not(:disabled),a[href]')];
 host.addEventListener('click',event=>{
  const toggle=event.target.closest('[data-header-toggle]');
  if(toggle){const key=toggle.dataset.headerToggle,wasOpen=opened===key;close();if(!wasOpen){opened=key;host.querySelector(`#header-${key}`).hidden=false;toggle.setAttribute('aria-expanded','true');}return;}
  const language=event.target.closest('[data-header-language]');if(language){close();onLanguage(language.dataset.headerLanguage);host.querySelector('[data-header-toggle="language"]')?.focus();return;}
  const read=event.target.closest('[data-header-read]');if(read){onRead(read.dataset.headerRead);host.querySelector('[data-header-toggle="notifications"]')?.focus();}
 },options);
 document.addEventListener('pointerdown',e=>{if(!host.contains(e.target))close();},options);
 document.addEventListener('focusin',e=>{if(!host.contains(e.target))close();else if(opened&&!e.target.closest('.aqar-header-menu')?.contains(host.querySelector(`#header-${opened}`)))close();},options);
 host.addEventListener('keydown',e=>{
  if(e.key==='Escape'&&opened){e.preventDefault();close(true);return;}
  const toggle=e.target.closest('[data-header-toggle]');if(toggle&&['ArrowDown','ArrowUp'].includes(e.key)){e.preventDefault();if(opened!==toggle.dataset.headerToggle)toggle.click();const list=items(host.querySelector(`#header-${opened}`));(e.key==='ArrowUp'?list.at(-1):list[0])?.focus();return;}
  if(opened&&['ArrowDown','ArrowUp','Home','End'].includes(e.key)){const list=items(host.querySelector(`#header-${opened}`));if(!list.includes(e.target))return;e.preventDefault();const index=list.indexOf(e.target);(e.key==='Home'?list[0]:e.key==='End'?list.at(-1):list[(index+(e.key==='ArrowDown'?1:list.length-1))%list.length])?.focus();}
 },options);
}

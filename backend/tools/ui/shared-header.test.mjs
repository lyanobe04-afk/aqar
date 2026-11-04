import test from 'node:test';
import assert from 'node:assert/strict';
import {load} from 'cheerio';
import {headerMarkup} from '../../public/assets/aqar/shared-header.js';
const base={languages:{en:'English',ar:'العربية'},locale:'en',t:s=>s,userName:'<Demo & User>',role:'Tenant',notifications:[{id:'n1',title:'<Unread notification>',read:false},{id:'n2',title:'Already read',read:true}],unread:1,profileUrl:'/profile',logoutUrl:'/logout',notificationsUrl:'/tenant/notifications'};
test('compact header has exactly three controls, selected languages, scoped notifications and nested logout',()=>{
 const $=load(headerMarkup(base));assert.equal($('[data-header-toggle]').length,3);assert.equal($('[role=menuitemradio][aria-checked=true]>span').first().text(),'English');assert.equal($('[data-header-read]').length,1);assert.equal($('.aqar-header-account strong').text(),'<Demo & User>');assert.equal($('.aqar-header-notification p').first().text(),'<Unread notification>');assert.equal($('a[href="/logout"]').closest('#header-profile').length,1);assert.equal($('.aqar-header-view-all').attr('href'),'/tenant/notifications');assert.equal($('.aqar-header-badge').text(),'1');assert.equal($('.aqar-unread-bell.has-unread').length,1);assert.equal($('script').length,0);
});
test('language selection supports configured languages and zero notifications omit badge',()=>{
 const $=load(headerMarkup({...base,locale:'ar',languages:{...base.languages,fr:'Français'},notifications:[],unread:0}));assert.equal($('[data-header-language]').length,3);assert.equal($('[aria-checked=true]').attr('data-header-language'),'ar');assert.equal($('.aqar-header-badge').length,0);assert.equal($('.aqar-unread-bell.has-unread').length,0);assert.equal($('.aqar-header-empty').text(),'No notifications yet');
});
test('signed-out shared header offers only languages without account actions',()=>{const $=load(headerMarkup({...base,profileUrl:''}));assert.equal($('[data-header-toggle]').length,1);assert.equal($('a[href="/logout"]').length,0);});

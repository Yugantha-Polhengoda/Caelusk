import{o as b,c as g,a as n,t as S,C as c,u as a,l as C,G as y,Y as f,h}from"./js/runtime-dom.esm-bundler.6789c400.js";import{c as P,b as x}from"./js/vue-router.fc4966b9.js";import{l as v}from"./js/index.3eb8f806.js";import{l as E}from"./js/index.ee8124c6.js";import{e as T,y as w,J as k,c as $}from"./js/index.20192476.js";import{d as m}from"./js/Caret.662da1f3.js";import{e as A,m as B}from"./js/postTitle.d67eb903.js";import{i as R}from"./js/isEqual.51bf23f5.js";import"./js/translations.12335a6a.js";import{i as D,_ as V,s as L}from"./js/default-i18n.54b5d8cd.js";import{_ as N}from"./js/App.01f2e941.js";import{_ as O}from"./js/ScoreButton.e2a31604.js";import{S as M}from"./js/LogoGear.29bd352d.js";import"./js/_plugin-vue_export-helper.249dac1d.js";import"./js/helpers.f95d5840.js";import"./js/metabox.dc73facf.js";import"./js/cleanForSlug.f9ffe7db.js";import"./js/toString.1401d490.js";import"./js/_baseTrim.940c51cf.js";import"./js/_stringToArray.08127ca9.js";import"./js/_baseSet.32e7a763.js";import"./js/regex.f8017116.js";import"./js/_baseIsEqual.6bc92395.js";import"./js/_getTag.8dc22eac.js";/* empty css                */import"./js/LicenseKeyBar.4ba21094.js";import"./js/ScrollTo.97c9805f.js";import"./js/params.764403f6.js";import"./js/allowed.f428d9c9.js";import"./js/constants.2019bcb3.js";import"./js/SettingsRow.1934f141.js";import"./js/Row.f01f32cd.js";import"./js/Checkbox.e983780b.js";import"./js/Checkmark.32f79576.js";import"./js/Tabs.2fd33524.js";import"./js/ProBadge.7733ac87.js";import"./js/Information.82968754.js";import"./js/Slide.d0517fb0.js";import"./js/Index.de83b4aa.js";import"./js/MaxCounts.d28a6cb7.js";import"./js/Tags.45075d79.js";import"./js/Ellipse.c57f22ea.js";import"./js/debounce.40834200.js";import"./js/toNumber.30f8b529.js";import"./js/toFinite.bbcc0565.js";import"./js/TruSeoScore.c8bdf339.js";import"./js/Tooltip.b6b45c85.js";import"./js/Statistics.324b239a.js";import"./js/Plus.c3a1a43f.js";import"./js/Eye.902c8763.js";import"./js/RadioToggle.64619d6b.js";import"./js/GoogleSearchPreview.2f81905c.js";import"./js/HtmlTagsEditor.4c8f78eb.js";import"./js/Editor.5a453aa4.js";import"./js/_baseClone.e959332d.js";import"./js/_arrayEach.f4f00336.js";import"./js/UnfilteredHtml.4ebe3c5f.js";import"./js/popup.001b1125.js";import"./js/SetupWizardStore.f902c357.js";import"./js/datetime.cb3980ce.js";import"./js/license.37048367.js";import"./js/upperFirst.96c04516.js";import"./js/Mobile.3fcac169.js";import"./js/Settings.0254ae9c.js";import"./js/TableOfContentsStore.62cf580e.js";import"./js/vue3-apexcharts.8b5abfad.js";import"./js/ConnectCta.444a26a5.js";import"./js/GoogleSearchConsole.9e8ca525.js";import"./js/Index.c0a0a208.js";import"./js/Blur.31bfcf06.js";import"./js/Graph.266090de.js";import"./js/numbers.b55b32c5.js";import"./js/WpTable.46584896.js";import"./js/Table.963c11c7.js";import"./js/Download.6a0d8455.js";import"./js/RequiredPlans.7629fd28.js";import"./js/addons.9d0af6ad.js";import"./js/PostTypes.d6c1987b.js";import"./js/External.b3b0805d.js";import"./js/InternalOutbound.b4a71286.js";import"./js/Image.47bc8de9.js";import"./js/FacebookPreview.8edcde79.js";import"./js/Img.2fc40874.js";import"./js/Profile.19fffd1c.js";import"./js/ImageUploader.82ab8ffd.js";import"./js/TwitterPreview.09956aa1.js";import"./js/Book.e7bb6a80.js";import"./js/Build.828bd995.js";import"./js/Redirects.921e33df.js";import"./js/Index.4759371c.js";import"./js/JsonValues.892a7505.js";import"./js/Url.0ccd8549.js";import"./js/External.c84e4310.js";import"./js/escapeRegExp.d673186c.js";import"./js/Exclamation.bf79561a.js";import"./js/Gear.1433c8c3.js";import"./js/date.839db266.js";import"./js/DatePicker.fd6399b7.js";import"./js/Calendar.4686ac3f.js";import"./js/pick.231724a9.js";import"./js/Card.46af096e.js";import"./js/Upsell.beb53fd9.js";let d={};const l=()=>{const t={...d},o=A();R(t,o)||(d=o,B())},U=()=>{const t=T();t.saveCurrentPost(t.currentPost).then(()=>{w().fetch()})},j=()=>{TVE.add_action("tcb-ready",l),["tcb.after-insert","tcb.element.remove","tcb.element.duplicate","tcb.froala.focus","tcb.froala.blur","tcb.image.change","after_undo_redo"].forEach(t=>{TVE.add_action(t,()=>{m(l,200)})}),TVE.add_action("tve.save_post.success",()=>{m(U,100)})};let r=!1;const q=()=>{TVE.$("#sidebar-top, #aioseo-score-btn-settings").on("click",".aioseo-score-button",()=>{const t=document.querySelector(".tcb-sidebar-icon-aioseo"),o=new MouseEvent("click",{bubbles:!0,cancelable:!0,view:window});t==null||t.dispatchEvent(o)}),TVE.$("#settings-action-btn").on("click",()=>{r=!r,TVE.$(".tcb-aioseo #settings-action-btn").toggleClass("active",r),TVE.$body.toggleClass("aioseo-settings-enabled",r),TVE.ajax("update_option","post",{option_name:"is_aioseo_settings_enabled",option_value:r}).done(()=>{})})},G=()=>{TVE.add_action("tcb.drawer.toggle",t=>{t==="settings"&&setTimeout(()=>{const o=TVE.$("#aioseo-panel"),e=TVE.$(".tcb-sidebar-icon-aioseo").hasClass("active");e?o.show():o.hide(),u(e)},100)}),TVE.add_action("tcb.drawer.hide",()=>{setTimeout(()=>{const t=TVE.$(".tcb-sidebar-icon-aioseo").hasClass("active");u(t)},110)})},u=t=>{TVE.$("#aioseo-score-btn-header .aioseo-score-button").toggleClass("aioseo-score-button--active",t),TVE.$body.toggleClass("aioseo-settings-active",t)},H=()=>{if(TVE.$("#aioseo-panel").length)return;const t=TVE.$(".settings"),o=TVE.$("<div>",{id:"aioseo-panel"}).hide();t.append(o)},W=()=>{if(TVE.$("#aioseo-score-btn-header").length)return;const t=TVE.$("#tcb-sidebar-top-right .button-group"),o=TVE.$("<div>",{id:"aioseo-score-btn-header"});t.append(o)},z=()=>{r=TVE.CONST.is_aioseo_settings_enabled==="true"||TVE.CONST.is_aioseo_settings_enabled==="1",r&&(TVE.$(".tcb-aioseo #settings-action-btn").addClass("active"),TVE.$body.addClass("aioseo-settings-enabled")),TVE.$("html").attr("dir",D()?"rtl":"ltr"),TVE.$("body").addClass("wp-core-ui"),H(),W(),G(),q()},s={id:"aioseo-limit-modified-date-thrive",param:"aioseo_limit_modified_date",title:V("Save (Don't Modify Date)","all-in-one-seo-pack"),flag:!1},J=()=>{TVE.$("#tve-save-dash-return").after(`
		<a
			href="javascript:void(0)"
			id="${s.id}"
			title="${s.title}"
		>
			${s.title}
		</a>
	`)},Y=()=>{TVE.add_filter("tcb_save_post_data_before",t=>(t[s.param]=s.flag,t)),TVE.add_action("tve.save_post.success",()=>{s.flag=!1}),TVE.$body.on("click",`#${s.id}`,()=>{s.flag=!0,TVE.main.editor_settings.save()})},F=()=>{J(),Y()},I={class:"edit-post-sidebar editor-sidebar aioseo-thrive-sidebar"},K={class:"aioseo-thrive-sidebar__header"},Q={class:"aioseo-thrive-sidebar__header-title"},X={class:"aioseo-thrive-sidebar__content"},_={__name:"Sidebar",setup(t){const e={headerTitle:L(V("%1$s Settings","all-in-one-seo-pack"),"AIOSEO")};return(i,p)=>(b(),g("div",I,[n("div",K,[n("div",Q,S(e.headerTitle),1)]),n("div",X,[c(a(N))])]))}},Z={class:"aioseo-thrive-score-button"},tt={__name:"Button",props:{buttonContext:{type:String}},setup(t){const{currentPost:o}=k(T());return(e,i)=>(b(),g("div",Z,[c(a(O),{score:a(o).seo_score,class:y([t.buttonContext==="Settings"?"aioseo-score-button--active":""])},{icon:C(()=>[c(a(M))]),_:1},8,["score","class"])]))}},ot=()=>{const t=P({history:x(),routes:[{path:"/",component:_}]});let o=f({name:"Standalone/ThriveArchitect",data(){return{tableContext:window.aioseo.currentPost.context,screenContext:"sidebar"}},render:()=>h(_)});o=v(o),o=E(o),o.use(t),t.app=o,$(o,t),o.mount("#aioseo-panel")},et=()=>{["aioseo-score-btn-settings","aioseo-score-btn-header"].forEach(o=>{const e=o.replace("aioseo-score-btn-","").replace(/^\w/,p=>p.toUpperCase());let i=f({name:`Standalone/ThriveArchitect/Score${e}`,render:()=>h(tt)},{buttonContext:e});i=v(i),i=E(i),$(i),i.mount(`#${o}`)})},it=()=>{z(),ot(),et(),F(),j()};it();
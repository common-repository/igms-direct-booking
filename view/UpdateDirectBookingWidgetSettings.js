const httpRequest=new XMLHttpRequest;function handleMouseClick(e){const t=document.getElementById("directBookingWidgetWordpressLogoutTooltip"),o=document.getElementById("directBookingSettingsProfileInfo"),n=document.getElementById("userBlockArrow");o.contains(e.target)||t&&"flex"===t.style.display&&(t.style.display="none",n.classList.remove("dashicons-arrow-up-alt2"),n.classList.add("dashicons-arrow-down-alt2"),window.removeEventListener("click",handleMouseClick))}function changeCheckAvailabilityButtonText(e){showSaveButton(!1),makePostRequest(updateRoutes.widgetCheckAvailabilityButtonTextUpdateUrl,{checkAvailabilityButtonText:e.value}).then((t=>{1===t&&(window.igmsDirectBookingWidgetMap.forEach((t=>{t.setButtonCheckAvailabilityText(e.value)})),showSaveButton(!0))}))}function changeBookNowButtonText(e){showSaveButton(!1),makePostRequest(updateRoutes.widgetBookNowButtonTextUpdateUrl,{bookNowButtonText:e.value}).then((t=>{1===t&&(window.igmsDirectBookingWidgetMap.forEach((t=>{t.setButtonBookNowText(e.value)})),showSaveButton(!0))}))}function chooseWidgetColor(e){showSaveButton(!1),makePostRequest(updateRoutes.widgetColorUpdateUrl,{widgetColor:e.value}).then((t=>{1===t&&(document.getElementById("colorCircle").style.backgroundColor=e.value,document.getElementById("colorHexValue").innerText=e.value,window.igmsDirectBookingWidgetMap.forEach((t=>{t.setWidgetColor(e.value)})),showSaveButton(!0))}))}function showSaveButton(e){document.getElementById("directBookingSettingsSaveBlock").style.display=e?"":"none"}function openLogoutTooltip(){const e=document.getElementById("directBookingWidgetWordpressLogoutTooltip"),t=document.getElementById("userBlockArrow");"none"===e.style.display||""===e.style.display?(e.style.display="flex",t.classList.remove("dashicons-arrow-down-alt2"),t.classList.add("dashicons-arrow-up-alt2"),window.addEventListener("click",handleMouseClick)):(e.style.display="none",t.classList.remove("dashicons-arrow-up-alt2"),t.classList.add("dashicons-arrow-down-alt2"),window.removeEventListener("click",handleMouseClick))}function makePostRequest(e,t){return new Promise((function(o,n){let s=JSON.stringify(t);httpRequest.open("POST",e),httpRequest.setRequestHeader("Content-Type","application/json; charset=utf-8"),httpRequest.onload=()=>{200===httpRequest.status?o(1):n(0)},httpRequest.onerror=()=>n(0),httpRequest.send(s)}))}
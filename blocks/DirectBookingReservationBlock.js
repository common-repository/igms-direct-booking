wp&&wp.blocks&&wp.blocks.registerBlockType("igms/direct-booking-reservation-widget-block",{title:"Igms Reservation Widget",icon:wp.element.createElement?wp.element.createElement("svg",{viewBox:"0 0 19 16",xmlns:"http://www.w3.org/2000/svg"},wp.element.createElement("path",{fill:"#FFC007",d:"M0 7.81893L4.59686 0H14.3975L19 7.82442L14.3582 16H4.7205L0 7.81893ZM4.22945 1.84127L0.910959 7.66875L3.86734 8.31746L4.22945 1.84127ZM1.17123 8.50794L4.48973 14.3492L3.89793 9.09536L1.17123 8.50794ZM4.75 9.39683L5.40649 15.1111L12.1678 13.3052L4.75 9.39683ZM7.54795 15.2381H13.6644L12.9892 13.8413L7.54795 15.2381ZM13.5993 13.487L14.2237 14.7937L16.8527 10.2857L13.5993 13.487ZM5.07534 8.80079L12.7534 12.8254L12.2648 4.8254L5.07534 8.80079ZM4.75 8.06349L11.7123 4.24898L5.16121 1.01587L4.75 8.06349ZM6.11644 0.634921L12.3509 3.74603L13.339 0.634921H6.11644ZM13.4697 12.6349L18.024 8.04351L13.0137 5.07937L13.4697 12.6349ZM13.0137 4.23002L17.5685 6.98413L14.0474 0.888889L13.0137 4.23002Z"})):{src:"admin-home",foreground:"#FFC007"},category:"common",attributes:{content:{type:"string",source:"html",selector:"figcaption"},blockId:{type:"string",default:null},selectedPropertyId:{type:"string",default:null}},edit:function(e){if(this.isListenerAdded||(this.isListenerAdded={}),this.isListenerAdded.hasOwnProperty(e.attributes.blockId)||(this.isListenerAdded[e.attributes.blockId]=!1),"undefined"==typeof directBookingWidgetProperties||!Array.isArray(directBookingWidgetProperties.properties)||0===directBookingWidgetProperties.properties.length)return"no property available";if(!e.attributes.blockId){let t="block"+Math.floor(Math.random()*10**7);e.setAttributes({blockId:t})}this.isListenerAdded[e.attributes.blockId]||(window.addEventListener("change",(t=>{t.target.id===e.attributes.blockId&&e.setAttributes({selectedPropertyId:t.target.value})})),this.isListenerAdded[e.attributes.blockId]=!0),e.attributes.selectedPropertyId||e.setAttributes({selectedPropertyId:directBookingWidgetProperties.properties[0].id});let t='<select id="'+e.attributes.blockId+'">';return t+=directBookingWidgetProperties.properties.map((t=>'<option value="'+t.id+'" '+(e.attributes.selectedPropertyId===t.id?"selected":"")+">"+t.name+"</option>")).join(""),t+="</select>",wp.element.RawHTML({children:t})},save:function(e){let t=e.attributes.selectedPropertyId??null;return`[igms-direct-booking-widget-reservation block_id=${e.attributes.blockId} property_id="${t}"]`}});
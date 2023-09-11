import tinymce from "tinymce";

import "tinymce/icons/default";
import "tinymce/themes/silver";
import "tinymce/skins/ui/oxide/skin.css";

import "tinymce/plugins/emoticons";
import "tinymce/plugins/emoticons/js/emojis";
import "tinymce/plugins/link";
import "tinymce/plugins/lists";
import "tinymce/plugins/save";

import "tinymce/models/dom/model";

declare global {
  interface Window {
    Tinymce: any;
    Livewire: any;
  }
}

export const render = (textarea: string) => {
  const component = document.querySelector('.app-main');
  const componentID = component?.attributes["wire:id"].value;
  const Livewire = window.Livewire;

  tinymce.init({
    selector: `#${textarea}`,
    plugins: "emoticons link lists save",
    toolbar:
      "styles | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | link emoticons | save",
    height: 300,
    menubar: false,
    statusbar: false,
    skin: false,
    content_css: false,
    language_url: "/js/es_MX.js",
    language: "es_MX",
    entity_encoding : "raw",
    save_onsavecallback: () => {
      let content = tinymce.get(textarea)?.getContent();
      Livewire.find(componentID).saveConfig(content);
    },
  });
};

import { Toast } from "../utils/toast";

const launchToast = ( e: any ) => {
  Toast.fire({
    icon: e.detail.icon,
    title: e.detail.message,
  });
};

window.addEventListener("toast-alert", launchToast);

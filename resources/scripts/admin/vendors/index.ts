// import * as AdminLte from "./adminlte";
import * as AdminLte from "admin-lte/dist/js/adminlte";
import { Modal } from "./bootstrap";
import Swal from "sweetalert2";
import Cropper from "cropperjs";

declare global {
  interface Window {
    Swal: any;
    Modal: any;
    Cropper: any;
  }
}

window.Swal = Swal;
window.Modal = Modal;
window.Cropper = Cropper;

export default { AdminLte };

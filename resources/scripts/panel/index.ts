import { loadAsyncModules, loadComponents } from "./utils/load";
import "./vendors";
import "./services/listener";

(() => {
  loadAsyncModules([...loadComponents()]);
})();

import { AsyncModule } from "../types";

export const loadComponents = (): Array<Promise<AsyncModule>> => {
  const components = [
    ...document.querySelectorAll<HTMLElement>("[data-component]"),
  ].map(({ dataset }) => dataset.component);

  const uniqueComponents = [...new Set(components)];

  const requests: Array<Promise<AsyncModule>> = [];
  for (const component of uniqueComponents) {
    requests.push(import(`../components/${component}/index`));
  }
  return requests;
};

export const loadAsyncModules = (asyncModules: Array<Promise<AsyncModule>>) => {
  Promise.allSettled(asyncModules)
    .then((resolvedModules) =>
      resolvedModules.forEach((mod) => {
        if (mod.status === "fulfilled") {
          mod.value.run();
        } else {
          console.error(mod.reason);
        }
      })
    )
    .catch((error) => {
      console.error("error", error);
    });
};

import { render } from './tinymce';

export const run = () => {
  document
    .querySelectorAll<HTMLElement>('[data-component="tinymce"]')
    .forEach((component) => {
      const textarea: HTMLTextAreaElement | null = component.querySelector('textarea');
      render(textarea?.id as string);
    });
};

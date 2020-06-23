import $ from 'jquery';

wp.customize('blogname', (value) => {
  value.bind(to => $('.brand').text(to));
});

wp.customize('intro_section_title', (value) => {
  value.bind(to => $('.welcome__title').text(to));
});
wp.customize('intro_section_lead', (value) => {
  value.bind(to => $('.welcome__lead').text(to));
});

wp.customize('brews_section_title', (value) => {
  value.bind(to => $('.brews__title').text(to));
});
wp.customize('brews_section_lead', (value) => {
  value.bind(to => $('.brews__lead').text(to));
});

wp.customize('articles_section_title', (value) => {
  value.bind(to => $('.new-articles__title').text(to));
});
wp.customize('articles_section_lead', (value) => {
  value.bind(to => $('.new-articles__lead').text(to));
});

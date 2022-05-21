self.addEventListener('fetch', event => {
  console.log('Fetching:', event.request.url);
});

self.addEventListener('install', event => {
  console.log('Service worker installed');
  self.skipWaiting();
});

self.addEventListener('activate', event => {
  console.log('Service worker activated');
});

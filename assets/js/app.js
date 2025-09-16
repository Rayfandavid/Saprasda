// assets/js/app.js
import React from 'react';
import ReactDOM from 'react-dom';
import InfiniteScroll from './InfiniteScroll';

const items = [
  { content: <div>Item 1</div> },
  { content: <div>Item 2</div> },
  { content: <div>Item 3</div> },
  // Tambahkan item sesuai kebutuhan
];

ReactDOM.render(
  <InfiniteScroll 
    items={items}
    width="80%"
    itemMinHeight={200}
    autoplay={true}
    autoplaySpeed={0.3}
  />,
  document.getElementById('infinite-scroll-container')
);
import $ from 'jquery';
import Masonry from 'masonry-layout';
import imagesLoaded from 'imagesloaded';

if ($('.feed-posts').length) {
    const layout = new Masonry('.feed-posts', {
        itemSelector: '.feed-post',
        columnWidth: '.feed-sizer',
        percentPosition: true,
        gutter: '.feed-post-gutter',
    });

    imagesLoaded(layout, function () {
        layout.layout();
    });
}

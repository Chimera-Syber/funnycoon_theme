( function ( doc ) {
    /**
     * Class Loadmore
     */

    class TopsLoadMore {
        /**
         * Constructor 
         */
        constructor() {
            this.ajaxUrl = siteConfig?.ajaxUrl ?? '';
            this.ajaxNonce = siteConfig?.ajax_nonce ?? '';
            this.loadMoreBtnPrev = $( '#tops_button_left' );
            this.loadMoreBtnNext = $( '#tops_button_right' );

            this.init();
        }

        init() {

            if ( ! this.loadMoreBtnPrev.length && ! this.loadMoreBtnNext.length ) {
                return;
            }

            this.loadMoreBtnPrev.on( 'click', () => this.handleReviewLoadMorePostsPrev() );
            this.loadMoreBtnNext.on( 'click', () => this.handleReviewLoadMorePostsNext() );

        }

        /**
		 * Load more posts.
		 *
		 * 1.Make an ajax request, by incrementing the page no. by one on each request.
		 * 2.Append new/more posts to the existing content.
		 *
		 * @return null
         */ 
        handleReviewLoadMorePostsPrev() {

            const page = this.loadMoreBtnPrev.data( 'page' );

            if ( ! page ) {
                return null;
            }

            const prevPage = parseInt( page ) - 1;

            $.ajax( {
                url: this.ajaxUrl,
                type: 'post',
                data: {
                    page: prevPage,
                    action: 'tops_load_more',
                    ajax_nonce: this.ajaxNonce,
                },
                success: ( response ) => {
                    if ( 0 === parseInt( response ) ) {

                    } else {
                        $( '.tops_slider' ).empty();
                        $( '.tops_slider').append( response );
                        this.loadMoreBtnNext.data( 'page', page );
                        this.loadMoreBtnPrev.data( 'page', prevPage );
                    }
                },
                error: ( response ) => {
                    console.log( response );
                },

            });

        }

        /**
		 * Load more posts.
		 *
		 * 1.Make an ajax request, by incrementing the page no. by one on each request.
		 * 2.Append new/more posts to the existing content.
		 *
		 * @return null
         */ 
        handleReviewLoadMorePostsNext() {

            const page = this.loadMoreBtnNext.data( 'page' );

            if ( ! page ) {
                return null;
            }

            const nextPage = parseInt( page ) + 1;
          

            $.ajax( {
                url: this.ajaxUrl,
                type: 'post',
                data: {
                    page: page,
                    action: 'tops_load_more',
                    ajax_nonce: this.ajaxNonce,
                },
                success: ( response ) => {
                    if ( 0 === parseInt( response ) ) {
                        console.log('123');
                    } else {
                        $( '.tops_slider' ).empty();
                        $( '.tops_slider').append( response );
                        this.loadMoreBtnPrev.data( 'page', page );
                        this.loadMoreBtnNext.data( 'page', nextPage );
                    }
                },
                error: ( response ) => {
                    console.log( response );
                },

             });


        }

    }

    new TopsLoadMore();

} )( document );
( function ( doc ) {
    /**
     * 
     * Class Loadmore
     * 
     */

    class LoadMore {
        /**
         * Constructor 
         */
        constructor() {
            this.ajaxUrl = siteConfig?.ajaxUrl ?? '';
            this.ajaxNonce = siteConfig?.ajax_nonce ?? '';
            this.loadMoreBtn = $( '#load-more' );

            this.init();
        }

        init() {

            if ( ! this.loadMoreBtn.length ) {
                return;
            }

            this.totalPagesCount = $( '#post-pagination' ).data( 'max-pages' );
            this.loadMoreBtn.on( 'click', () => this.handleLoadMorePosts() );

        }

        /**
		 * Load more posts.
		 *
		 * 1.Make an ajax request, by incrementing the page no. by one on each request.
		 * 2.Append new/more posts to the existing content.
		 * 3.If the response is 0 ( which means no more posts available ), remove the load-more button from DOM.
		 * Once the load-more button gets removed, the IntersectionObserverAPI callback will not be triggered, which means
		 * there will be no further ajax request since there won't be any more posts available.
		 *
		 * @return null
		 */
        handleLoadMorePosts() {
            // Get page no from data attribute of load-more button.
            const page = this.loadMoreBtn.data( 'page' );
            if ( ! page ) {
                return null;
            }

            const nextPage = parseInt( page ) + 1; // Increment count by one.

            this.loadMoreBtn.text('Загрузка...');

            $.ajax( {
                url: this.ajaxUrl,
                type: 'post',
                method: 'POST',
                data: {
                    page: page,
                    action: 'load_more',
                    ajax_nonce: this.ajaxNonce,
                },
                success: ( response ) => {
                    if ( 0 === parseInt( response ) ) {
                        this.loadMoreBtn.off( 'click', () => this.handleLoadMorePosts() );
                        this.loadMoreBtn.remove();
                    } else {
                        this.loadMoreBtn.data( 'page', nextPage );
                        $( '#load-more-content' ).append( response );
                        this.removeLoadMoreIfOnLastPage( nextPage );
                        this.loadMoreBtn.text('Загрузить еще');
                    }
                },
                error: ( response ) => {
					console.log( response );
				},

            });
        }

        /**
		 * Remove Load more Button If on last page.
		 *
		 * @param {int} nextPage New Page.
		 */
		removeLoadMoreIfOnLastPage( nextPage ) {
			if ( nextPage + 1 > this.totalPagesCount ) {
				this.loadMoreBtn.remove();
			}
		}

    }

    new LoadMore();

} )( document );
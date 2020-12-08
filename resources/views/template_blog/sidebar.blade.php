<!-- Start Blog Post Siddebar -->
          <div class="col-lg-4 sidebar-widgets">
              <div class="widget-wrap">
                <div class="single-sidebar-widget newsletter-widget">
                <form action="{{ route('blog.search') }}" method="get">
                  <div class="form-group mt-30">
                    <div class="col-autos">
                      <input type="text" class="form-control" name="keyword" id="inlineFormInputGroup" placeholder="Search...">
                    </div>
                  </div>
                  <button type="submit" class="bbtns d-block mt-20 w-100">Search</button>
                </form>
                </div>


                <div class="single-sidebar-widget post-category-widget">
                  <h4 class="single-sidebar-widget__title">Categories</h4>
                  <ul class="cat-list mt-20">
                      @foreach($categories as $category)
                      <a href="{{ route('blog.category', $category->slug) }}" class="d-flex justify-content-between">
                        <p>{{ $category->name }}</p>
                        <p>{{ $category->posts->count() }}</p>
                      </a>
                      @endforeach
                    </li>
                  </ul>
                </div>

                  <div class="single-sidebar-widget tag_cloud_widget">
                    <h4 class="single-sidebar-widget__title">Tags</h4>
                    <ul class="list">
                      @foreach($tags as $tag)
                      <li>
                          <a href="{{ url('tag', $tag->slug) }}">{{ $tag->name }}</a>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
          </div>


          
          
        </div>
    </section>

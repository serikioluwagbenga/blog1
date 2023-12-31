
<ul class="comment-list">
 @foreach($blogComments as $key => $data)
    @php
        $author_image = render_image_markup_by_attachment_id(optional($data->user)->image);
        $avatar_image = render_image_markup_by_attachment_id(get_static_option('single_blog_page_comment_avatar_image'));
        $commented_user_image = $author_image ? $author_image : $avatar_image;
    @endphp
@if($data->comment_approve_status == 1)
    <li>
        <div class="single-comment-wrap">
            <div class="thumb">
                {!! $commented_user_image !!}
            </div>
            <div class="content">
                <div class="content-top">
                    <div class="left">
                        <h4 class="title" data-parent_name="{{optional($data->user)->name }}">{{optional($data->user)->name ?? ''}}</h4>
                        <ul class="post-meta">
                            <li class="meta-item comment-date">
                                <i class="lar la-calendar icon"></i>
                               {{optional($data->created_at)->format('d-m-Y')}}
                            </li>
                        </ul>
                    </div>
                </div>

                <p class="comment common-para">{!! $data->comment_content ?? '' !!}</p>

               @if(auth('web')->check() && auth('web')->id() != $data->user_id)
                <div class="reply">
                     <a href="#" data-comment_id="{{ $data->id }}" class="reply-btn btn-replay"><i class="las la-reply icon"></i><span class="text">{{__('Reply')}}</span></a>
                </div>
              @endif
            </div>
        </div>
    </li>
    @endif


    <li class="has-children">
        <ul>
            @foreach($data->reply as $repData)
                @php
                    $child_author_image = render_image_markup_by_attachment_id(optional($repData->user)->image);
                    $avatar_image = render_image_markup_by_attachment_id(get_static_option('single_blog_page_comment_avatar_image'));
                    $commented_child_author_image = $child_author_image ? $child_author_image : $avatar_image;
                @endphp

    @if($repData->comment_approve_status == 1)
            <li>
                <div class="single-comment-wrap">
                    <div class="thumb">
                        {!! $commented_child_author_image !!}
                    </div>
                    <div class="content">
                        <div class="content-top">
                            <div class="left">
                                <h4 class="title">{{optional($repData->user)->name }}</h4>
                                <ul class="post-meta">
                                    <li class="meta-item">
                                        <i class="lar la-calendar icon"></i>
                                        {{date('d F Y', strtotime($repData->created_at ?? ''))}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p class="comment common-para">{!! $repData->comment_content ?? '' !!}</p>
                    </div>
                </div>
            </li>
           @endif
            @endforeach
        </ul>
    </li>

 @endforeach
</ul>


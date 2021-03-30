import '../__mocks__/match-media';
import React from 'react';
import {Post} from '../components/news/post';
import {PostEntity} from '../components/ajax/types';
import {act} from 'react-dom/test-utils';
import {render} from 'react-dom';

let container: HTMLDivElement | any = null;

beforeEach(() => {
    // подготавливаем DOM-элемент, куда будем рендерить
    container = document.createElement("div");
    document.body.appendChild(container);
});

describe('posts tests', () => {
    it('Simple post', () => {
        let post: PostEntity = {
            image: [''],
            postText: 'lorem',
            postId: 1,
            comments: [],
            date: new Date().toISOString(),
            edited: true,
            fullname: 'Developer',
            isLiked: false,
            isMine: false,
            isn: '5565',
            isVoted: false,
            likes: 1,
            post_poll: {
                question_id: null,
                question_title: null,
                answers: [],
                total_votes: 0
            }
        };

        expect(container).not.toBeNull();
        act(() => {
            render(<Post post={post} />, container);
        });
        expect(container.querySelector('.is-edited')).not.toBeNull();
        expect(container.querySelector('.is-edited').textContent).toBe('отредактировано');
    });
});

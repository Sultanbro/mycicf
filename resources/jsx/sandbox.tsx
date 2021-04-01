import React from 'react';
import {Posts} from "./components/news/posts";
import {Col} from "antd";
import {Birthdays} from "./components/birthdays/birthdays";
import {PostComment} from "./components/news/post-comment";
import {PostCommentEntity} from "./components/ajax/types";
import {ColleagueData} from "./components/colleague-data";
import {authUserIsn} from "./authUserIsn";
import {UserName} from "./UserName";

export function Sandbox({}: any) {
    return <div>
        {/*<ColleagueData isn={authUserIsn()} />*/}

        {/*<Posts />*/}

        {/*<Birthdays />*/}

        {/*<Centcoins />*/}

        {/*<CentcoinOperationsList />*/}

        {/*<CoordinationList />*/}

        {/*<UserMenu />*/}

        {/*<BossPosts />*/}

        {/*<Dossier />*/}

        {/*<Sidebar />*/}

        <UserName isn={'5565'} username={'Developer'} />
    </div>
}

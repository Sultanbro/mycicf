import React, {useState} from 'react';
import {Button} from 'antd';

export interface ReadMoreProps {
    text: string;
    limit?: number;
}

// TODO
export function ReadMore({text, limit = 350}: ReadMoreProps) {
    let [expanded, setExpanded] = useState(false);
    let length = text.length;
    let limitedText = text;
    if (length >= limit && !expanded) {
        limitedText = text.substr(0, limit);
    }

    let showButton = length >= limit;

    if (expanded) {
        showButton = false;
    }

    return <div>
        {limitedText}

        {showButton ? <div>
            <Button type="link"
                    onClick={() => {
                        setExpanded(true);
                    }}>
                Показать больше
            </Button>
        </div> : null}
    </div>
}

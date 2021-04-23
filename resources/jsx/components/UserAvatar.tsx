import { Avatar, Image } from "antd";
import React from "react";
import { AvatarSize } from "antd/es/avatar/SizeContext";
import { ISN } from "../types";

interface UserAvatarProps {
  isn: ISN;
  size?: AvatarSize;
  shape?: "circle" | "square";
  title?: string;
}

const DEFAULT_AVATAR = "/images/avatar.png";

let url = (isn: ISN) => `/storage/images/employee/${isn}.png`
// let url = (isn: ISN) => `https://dummyimage.com/340x340/95bbdf/ffffff.png&text=${isn}`;
// let url = (isn: ISN) => DEFAULT_AVATAR;

export function UserAvatar({
  isn,
  size = 64,
  shape = "circle",
  title,
}: UserAvatarProps) {
  let placeholder = (
    <Image preview={false} src={DEFAULT_AVATAR} loading="lazy" title={title} />
  );
  let src = (
    <Image
      preview={false}
      src={url(isn)}
      placeholder={placeholder}
      loading="lazy"
      title={title}
    />
  );
  return <Avatar size={size} src={src} shape={shape} />;
}

interface UserPhotoProps {
  isn: ISN;
}

export function UserPhoto({ isn }: UserPhotoProps) {
  return <Image src={url(isn)} loading="lazy" />;
}

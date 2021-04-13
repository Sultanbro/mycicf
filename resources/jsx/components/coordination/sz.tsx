import React from "react";
import { Table } from "antd";

export interface SZEntry {
  DeptName: string;
  ISN: string;
  curator: string;
  docdate: string;
  id: string;
  sz_class_isn: string;
  sz_isn: string;
  type: string;
}

interface SZProps {
  data: SZEntry[];
}

/**
 * Служебные записки
 *
 */
export function SZ({ data }: SZProps) {
  return (
    <Table
      columns={[
        {
          title: "Номер документа",
          dataIndex: "id",
          key: "id",
        },
        {
          title: "Тип документа",
          dataIndex: "type",
          key: "type",
        },
        {
          title: "Инициатор",
          dataIndex: "curator",
          key: "curator",
        },
        {
          title: "Подразделение",
          dataIndex: "DeptName",
          key: "DeptName",
        },
        {
          title: "Дата",
          dataIndex: "docdate",
          key: "docdate",
        },
      ]}
      dataSource={data}
    />
  );
}

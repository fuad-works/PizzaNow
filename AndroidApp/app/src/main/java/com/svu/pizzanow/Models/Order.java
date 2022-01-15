package com.svu.pizzanow.Models;

import androidx.annotation.NonNull;
import androidx.room.ColumnInfo;
import androidx.room.Entity;
import androidx.room.Ignore;
import androidx.room.PrimaryKey;

import java.util.List;

@Entity(tableName = "orders")
public class Order {

    @PrimaryKey
    @NonNull
    int id;
    @ColumnInfo(name = "user_id")
    int user_id;

    @ColumnInfo(name = "order_date")
    String order_date;

    @Ignore
    List<OrderDetails> details;

    @Ignore
    int status;

    public Order() {
    }

    public Order(int id, int user_id, String order_date, List<OrderDetails> details) {
        this.id = id;
        this.user_id = user_id;
        this.order_date = order_date;
        this.details = details;
    }

    public int getStatus() {
        return status;
    }

    public void setStatus(int status) {
        this.status = status;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getUser_id() {
        return user_id;
    }

    public void setUser_id(int user_id) {
        this.user_id = user_id;
    }

    public String getOrder_date() {
        return order_date;
    }

    public void setOrder_date(String order_date) {
        this.order_date = order_date;
    }

    public List<OrderDetails> getDetails() {
        return details;
    }

    public void setDetails(List<OrderDetails> details) {
        this.details = details;
    }
}

package com.svu.pizzanow.Models;

import androidx.annotation.NonNull;
import androidx.room.ColumnInfo;
import androidx.room.Entity;
import androidx.room.PrimaryKey;

@Entity(tableName = "order_details")
public class OrderDetails {

    @PrimaryKey
    @NonNull
    int id;

    @ColumnInfo(name = "order_id")
    int order_id;

    @ColumnInfo(name = "product_id")
    int product_id;

    @ColumnInfo(name = "quantity")
    int quantity;

    @ColumnInfo(name = "customize")
    String customize;

    public OrderDetails() {
    }

    public OrderDetails(int id, int order_id, int product_id, int quantity, String customize) {
        this.id = id;
        this.order_id = order_id;
        this.product_id = product_id;
        this.quantity = quantity;
        this.customize = customize;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getOrder_id() {
        return order_id;
    }

    public void setOrder_id(int order_id) {
        this.order_id = order_id;
    }

    public int getProduct_id() {
        return product_id;
    }

    public void setProduct_id(int product_id) {
        this.product_id = product_id;
    }

    public int getQuantity() {
        return quantity;
    }

    public void setQuantity(int quantity) {
        this.quantity = quantity;
    }

    public String getCustomize() {
        return customize;
    }

    public void setCustomize(String customize) {
        this.customize = customize;
    }
}

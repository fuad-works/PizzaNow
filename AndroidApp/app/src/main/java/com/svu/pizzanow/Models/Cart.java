package com.svu.pizzanow.Models;

import androidx.annotation.NonNull;
import androidx.room.ColumnInfo;
import androidx.room.Entity;
import androidx.room.PrimaryKey;

@Entity(tableName = "cart")
public class Cart {

    @PrimaryKey(autoGenerate = true)
    int id;

    @ColumnInfo(name = "product_id")
    int product_id;

    @ColumnInfo(name = "quantity")
    int quantity;

    @ColumnInfo(name = "customize")
    String customize;

    public Cart() {
    }

    public Cart(int product_id, int quantity, String customize) {
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

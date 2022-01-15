package com.svu.pizzanow.DataBase.DAO;

import static androidx.room.OnConflictStrategy.REPLACE;

import androidx.room.Dao;
import androidx.room.Delete;
import androidx.room.Insert;
import androidx.room.Query;
import androidx.room.Update;

import com.svu.pizzanow.Models.Product;

import java.util.List;

@Dao
public interface ProductDao {

    @Delete
    void clear_all(List<Product> data);

    @Query("SELECT * FROM products")
    List<Product> get_all();

    @Insert(onConflict = REPLACE)
    long add_new(Product data);

    @Insert(onConflict = REPLACE)
    void add_all(List<Product> data);

    @Query("SELECT * FROM products WHERE id = :id")
    Product get_by_id(int id);

    @Delete
    void delete(Product cart);

    @Update
    public void updateOrder(Product cart);

}

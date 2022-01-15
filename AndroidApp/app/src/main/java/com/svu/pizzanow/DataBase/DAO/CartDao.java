package com.svu.pizzanow.DataBase.DAO;

import static androidx.room.OnConflictStrategy.REPLACE;

import androidx.room.Dao;
import androidx.room.Delete;
import androidx.room.Insert;
import androidx.room.Query;

import com.svu.pizzanow.Models.Cart;
import com.svu.pizzanow.Models.Order;

import java.util.List;

@Dao
public interface CartDao {

    @Delete
    void clear_all(List<Cart> data);

    @Query("SELECT * FROM cart")
    List<Cart> get_all();

    @Insert(onConflict = REPLACE)
    long add_new(Cart data);

    @Insert(onConflict = REPLACE)
    void add_all(List<Cart> data);

    @Query("SELECT * FROM cart WHERE id = :id")
    Cart get_by_id(int id);

    @Query("DELETE FROM cart")
    void clear();

    @Delete
    void delete(Cart cart);

}
